<?php

namespace Lit\Config\Form\Fields;

use App\Models\OpeningHour;
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
            'singular' => 'Relation',
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
            $form->manyRelation('openingHours')
                ->model(OpeningHour::class)
                ->title('Opening Hours')
                ->showTableHead()
                ->deleteUnlinked()
                ->hideRelationLink()
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
        });
    }
}
