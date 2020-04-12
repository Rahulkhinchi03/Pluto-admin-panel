<?php

namespace SertxuDeveloper\Lyra\Http\Resources;

use App\User;
use SertxuDeveloper\Lyra\Fields\Id;
use SertxuDeveloper\Lyra\Fields\Password;
use SertxuDeveloper\Lyra\Fields\Text;

class LaravelProfile extends Resource {

  public static $model = User::class;
  public static $search = ["id", "name", "email"];

  public $singular = "User";
  public $plural = "Users";

  public function fields() {

    return [
      Id::make('Id')->description('Autoincrement'),
      Text::make('Name')->size(50)->sortable(),
      Text::make('Email')->description('Also used to log in')->sortable(),
      Password::make('Password'),
    ];
  }

}
