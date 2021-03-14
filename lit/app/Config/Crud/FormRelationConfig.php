<?php

namespace Lit\Config\Crud;

use App\Models\FormRelation;
use App\Models\OpeningHour;
use Ignite\Crud\Config\CrudConfig;
use Ignite\Crud\CrudShow;
use Ignite\Page\Table\ColumnBuilder;
use Lit\Http\Controllers\Crud\FormRelationController;

class FormRelationConfig extends CrudConfig
{
    /**
     * Model class.
     *
     * @var string
     */
    public $model = FormRelation::class;

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = FormRelationController::class;

    /**
     * Model singular and plural name.
     *
     * @param FormRelation|null formRelation
     * @return array
     */
    public function names(FormRelation $formRelation = null)
    {
        return [
            'singular' => 'Relations',
            'plural'   => 'Relations',
        ];
    }

    /**
     * Get crud route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'form/relations';
    }

    /**
     * Setup show page.
     *
     * @param  \Ignite\Crud\CrudShow $page
     * @return void
     */
    public function show(CrudShow $page)
    {
        $page->info()->text('The following examples give an overview of the many variations of relationship fields that can be used to edit or display laravel model relationships.');

        $page->card(function ($form) {
            $form->relation('orders')->query(fn ($query) => $query->with('user'))->showTableHead();
        })->title('HasMany, BelongsToMany, ...');

        $page->card(function ($form) {
            $form->relation('user')->preview(function (ColumnBuilder $preview) {
                $preview->col('name');
                $preview->col('email');
            });
        })->title('HasOne, BelongsTo, ...');

        $page->card(function ($form) {
            $form->info()->text('In the following example, relation ship models are created in a modal before linking and deleted when unlinking the relationship. In addition, the relationship model data can be edited in inline fields. This makes it as easy as possible for the user to manage the opening hours.');

            $form->manyRelation('opening_hours')
                ->model(OpeningHour::class)
                ->title('Opening Hours')
                ->sortable()
                ->preview(function ($preview) {
                    $preview->col('Week Day')->value('{week_day}');

                    $preview->field('Opening Time')
                        ->time('opening_at')
                        ->minuteInterval(15);

                    $preview->field('Closing Time')
                        ->time('closing_at')
                        ->minuteInterval(15);
                })
                ->names([
                    'singular' => 'Opening Hour',
                    'plural'   => 'Opening Hours',
                ])
                ->showTableHead()
                ->deleteUnlinked()
                ->hideRelationLink()
                ->create(function ($form) {
                    $form->select('week_day')
                        ->title('Day')
                        ->options([
                            'monday'    => 'Monday',
                            'tuesday'   => 'Tuesday',
                            'wednesday' => 'Wednesday',
                            'thursday'  => 'Thursday',
                            'friday'    => 'Friday',
                            'saturday'  => 'Saturday',
                            'sunday'    => 'Sunday',
                        ])
                        ->rules('required');
                    $form->time('opening_at')
                        ->minuteInterval(15)
                        ->width(1 / 2)
                        ->rules('required');
                    $form->time('closing_at')
                        ->minuteInterval(15)
                        ->width(1 / 2)
                        ->rules('required');
                });
        });
    }
}
