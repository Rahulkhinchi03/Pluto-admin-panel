<?php

namespace SertxuDeveloper\Lyra\Fields;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

abstract class Field {

  public string $component = '';

  public string $name = '';
  public string $column = '';
  public bool $sortable = false;
  public array $creationRules = [];
  public array $updatingRules = [];

  public bool $showOnIndex = true;
  public bool $showOnShow = true;
  public bool $showOnCreate = true;
  public bool $showOnUpdate = true;

  /**
   * Create a new instance of the field
   *
   * @param string $name
   * @param null $column
   * @return $this
   */
  static public function make(string $name, $column = null): self {
    $field = new static();
    $field->name = $name;
    $field->column = $column ?? Str::snake(Str::lower($name));

    return $field;
  }

  /**
   * Add field-specific data to the response
   */
  public function additional(): array {
    return [];
  }

  /**
   * Check if the field can be displayed in the current view
   *
   * @param Request $request
   * @return bool
   */
  public function canShow(Request $request): bool {
    $route = $request->route()->getName();
    $route = str_replace(config('lyra.routes.api.name'), '', $route);
    switch ($route) {
      case 'resources.index':
        return $this->showOnIndex;

      case 'resources.create':
      case 'resources.store':
        return $this->showOnCreate;

      case 'resources.show':
        return $this->showOnShow;

      case 'resources.edit':
      case 'resources.update':
        return $this->showOnUpdate;

      default:
        return false;
    }
  }

  /**
   * Set the rules for the creation
   *
   * @param string[] $rules
   * @return $this
   */
  public function creationRules(string ...$rules): self {
    $this->creationRules = $rules;
    return $this;
  }

  /**
   * Get the key of the field based on it's name
   *
   * @return string
   */
  public function getKey(): string {
    return is_string($this->column) ? $this->column : Str::snake($this->name);
  }

  /**
   * Hide the field on form views
   *
   * @return $this
   */
  public function hideOnForms(): self {
    $this->showOnCreate = false;
    $this->showOnUpdate = false;
    return $this;
  }

  /**
   * Hide the field on the index view
   *
   * @return $this
   */
  public function hideOnIndex(): self {
    $this->showOnIndex = false;
    return $this;
  }

  /**
   * Hide the field on the index view
   *
   * @return $this
   */
  public function hideOnShow(): self {
    $this->showOnShow = false;
    return $this;
  }

  /**
   * Set the rules for creation and update
   *
   * @param string[] $rules
   * @return $this
   */
  public function rules(string ...$rules): self {
    $this->creationRules = $rules;
    $this->updatingRules = $rules;
    return $this;
  }

  /**
   * Set the field as sortable
   *
   * @return $this
   */
  public function sortable(): self {
    $this->sortable = true;
    return $this;
  }

  public function toArray(Model $model): array {
    $field = [
      'key' => $this->getKey(),
      'component' => $this->component,
      'name' => $this->name,
      'value' => $model->{$this->column},
    ];

    return array_merge($field, $this->additional());
  }

  /**
   * Set the rules for the update
   *
   * @param string[] $rules
   * @return $this
   */
  public function updatingRules(string ...$rules): self {
    $this->updatingRules = $rules;
    return $this;
  }
}
