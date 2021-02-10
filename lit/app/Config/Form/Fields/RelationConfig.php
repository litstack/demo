<?php

namespace Lit\Config\Form\Fields;

use App\Models\OpeningHour;
use App\Models\Product;
use Ignite\Crud\Config\FormConfig;
use Ignite\Crud\CrudShow;
use Lit\Http\Controllers\Form\Fields\RelationController;

class RelationConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = RelationController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'fields/relation';
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Relation <span class="badge badge-success">new</span>',
        ];
    }

    /**
     * Setup form page.
     *
     * @param  \Lit\Crud\CrudShow $page
     * @return void
     */
    public function show(CrudShow $page)
    {
        $page->card(function ($form) {
            $form->manyRelation('products')
                ->model(Product::class)
                ->preview(function ($preview) {
                    $preview->col('Title')->value('{title}');
                });

            $form->markdown('
Use the `relation` field to simply link models using any type of laravel relation.

```php
$form->manyRelation(\'products(\')
    ->model(Product::class)
    ->preview(function ($preview) {
        // Build table columns.
        $preview->col((\'Title(\')->value((\'{title}(\');
    });
```
');
        });

        $page->card(function ($form) {
            $form->manyRelation('openingHours')
                ->model(OpeningHour::class)
                ->title('Opening Hours')
                ->showTableHead()
                ->deleteUnlinked()
                ->hideRelationLink()
                ->sortable()
                ->names([
                    'singular' => 'Opening Hour',
                    'plural'   => 'Opening Hours',
                ])
                ->preview(function ($preview) {
                    $preview->col('Week Day')->value('{week_day}');

                    $preview->field('Opening Time')
                        ->time('opening_at')
                        ->minuteInterval(15);

                    $preview->field('Closing Time')
                        ->time('closing_at')
                        ->minuteInterval(15);
                })
                ->create(function ($form) {
                    $form->select('week_day')
                        ->title('Wochentag')
                        ->options([
                            'monday'    => 'Monday',
                            'tuesday'   => 'Tuesday',
                            'wednesday' => 'Wednesday',
                            'thursday'  => 'Thursday',
                            'friday'    => 'Friday',
                            'saturday'  => 'Saturday',
                            'sunday'    => 'Sunday',
                        ]);
                    $form->time('opening_at')
                        ->minuteInterval(15)
                        ->width(1 / 2);

                    $form->time('closing_at')
                        ->minuteInterval(15)
                        ->width(1 / 2);
                });

            $form->markdown('                
This advanced usecase shows how to create new relationship models direclty and edit them using inline fields.

```php
$form->manyRelation(\'openingHours\')
    ->model(OpeningHour::class)
    ->title(\'Opening Hours\')
    ->showTableHead()
    ->deleteUnlinked()
    ->hideRelationLink()
    ->sortable()
    ->names([
        \'singular\' => \'Opening Hour\',
        \'plural\'   => \'Opening Hours\',
    ])
    ->preview(function ($preview) {
        $preview->col(\'Week Day\')->value(\'{week_day}\');

        $preview->field(\'Opening Time\')
            ->time(\'opening_at\')
            ->minuteInterval(15);

        $preview->field(\'Closing Time\')
            ->time(\'closing_at\')
            ->minuteInterval(15);
    })
    ->create(function ($form) {
        $form->select(\'week_day\')
            ->title(\'Wochentag\')
            ->options([
                \'monday\'    => \'Monday\',
                \'tuesday\'   => \'Tuesday\',
                \'wednesday\' => \'Wednesday\',
                \'thursday\'  => \'Thursday\',
                \'friday\'    => \'Friday\',
                \'saturday\'  => \'Saturday\',
                \'sunday\'    => \'Sunday\',
            ]);
        $form->time(\'opening_at\')
            ->minuteInterval(15)
            ->width(1 / 2);

        $form->time(\'closing_at\')
            ->minuteInterval(15)
            ->width(1 / 2);
    });
```
            ');
        });
    }
}
