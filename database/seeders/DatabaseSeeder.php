<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Club;
use App\Models\Country;
use App\Models\Game;
use App\Models\Manager;
use App\Models\Permission;
use App\Models\Player;
use App\Models\Position;
use App\Models\Role;
use App\Models\Stadium;
use App\Models\Tournament;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

         $test_user = \App\Models\User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@test.com',
             "password" => Hash::make("test")
         ]);

        $CAN_VIEW_STATS = Permission::query()->create(["name" => "CAN_VIEW_STATS", "slug" => "Просмотр статистики"]);
        $CAN_EDIT_MODELS = Permission::query()->create(["name" => "CAN_EDIT_MODELS", "slug" => "Редактирование моделей"]);
        $CAN_DELETE_MODELS = Permission::query()->create(["name" => "CAN_DELETE_MODELS", "slug" => "Удаление моделей"]);
        $CAN_CREATE_MODELS = Permission::query()->create(["name" => "CAN_CREATE_MODELS", "slug" => "Создание моделей"]);
        $CAN_MANAGE_USERS = Permission::query()->create(["name" => "CAN_MANAGE_USERS", "slug" => "Управление пользователями"]);
        $CAN_MANAGE_ROLES = Permission::query()->create(["name" => "CAN_MANAGE_ROLES", "slug" => "Управление ролями"]);

        $USER_ROLE = Role::query()->create(["slug" => "Пользователь", "color" => "#1CD6CE"]);
        $MODER_ROLE = Role::query()->create(["slug" => "Модератор", "color" => "#FEDB39"]);
        $ADMIN_ROLE = Role::query()->create(["slug" => "Администратор", "color" => "#293462"]);
        $OWNER_ROLE = Role::query()->create(["slug" => "Команда проекта", "color" => "#D61C4E"]);


        $USER_ROLE->permissions()->sync([$CAN_VIEW_STATS->id]);
        $MODER_ROLE->permissions()->sync([$CAN_VIEW_STATS->id, $CAN_CREATE_MODELS->id, $CAN_DELETE_MODELS->id, $CAN_EDIT_MODELS->id]);
        $ADMIN_ROLE->permissions()->sync([$CAN_VIEW_STATS->id, $CAN_CREATE_MODELS->id, $CAN_DELETE_MODELS->id, $CAN_EDIT_MODELS->id, $CAN_MANAGE_USERS->id]);
        $OWNER_ROLE->permissions()->sync([$CAN_VIEW_STATS->id, $CAN_CREATE_MODELS->id, $CAN_DELETE_MODELS->id, $CAN_EDIT_MODELS->id, $CAN_MANAGE_USERS->id, $CAN_MANAGE_ROLES->id]);

        $test_user->roles()->attach($OWNER_ROLE);

        Country::factory()->create([
            "name" => "Неизвестно"
        ]);

        Tournament::factory()->create([
           "name" => "Товарищеские матчи"
        ]);

        Club::factory()->create([
            "name" => "Неизвестно",
            "country_id" => 1
        ]);

        Stadium::factory()->create([
            "name" => "Неизвестно",
            "country_id" => 1,
            "club_id" => 1
        ]);

        Position::query()->create(["name" => "Нападающий"]);
        Position::query()->create(["name" => "Полузащитник"]);
        Position::query()->create(["name" => "Защитник"]);
        Position::query()->create(["name" => "Вратарь"]);

        Country::factory(10)->create();
        Tournament::factory(3)->create();
        Club::factory(15)->create()->each(function (Club $club) {
            $club->stadium()->save(Stadium::factory()->make());
            $club->manager()->save(Manager::factory()->make());
            $club->players()->saveMany(Player::factory(11)->make());
        });

        Game::factory()->create();


    }
}
