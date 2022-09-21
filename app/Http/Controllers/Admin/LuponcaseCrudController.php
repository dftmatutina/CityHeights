<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LuponcaseRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class LuponcaseCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class LuponcaseCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Luponcase::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/luponcase');
        CRUD::setEntityNameStrings('Lupon Record', 'Lupon Records');

    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::RemoveField('id');
        CRUD::column('datefiled')->label('Date Filed');
        CRUD::column('caseno')->type('text')->label('Case #');
        CRUD::column('complainant')->label('Complainant');
        CRUD::column('respondent')->label('Respondent');
        CRUD::column('casetitle')->label('Case Title');
        CRUD::column('casenum')->type('number')->label('Number');
        CRUD::column('disposition')->type('enum')->label('Disposition');
        CRUD::column('caselevel')->type('enum')->label('Level');
        CRUD::column('link')->label('Link');
        CRUD::column('updated_at')->type('datetime');
        CRUD::column('created_at')->type('datetime');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(LuponcaseRequest::class);

        CRUD::RemoveField('id');
        CRUD::field('datefiled')->label('Date Filed');
        CRUD::field('caseno')->type('text')->label('Case No.');
        CRUD::field('complainant')->label('Complainant');
        CRUD::field('respondent')->label('Respondent');
        CRUD::field('casetitle')->label('Case Title');
        CRUD::field('casenum')->label('Number')->type('number');
        CRUD::field('disposition')->type('enum')->label('Disposition');
        CRUD::field('caselevel')->type('enum')->label('Level');
        CRUD::field('link')->label('Link');
        CRUD::field('created_at')->type('datetime');
        CRUD::field('updated_at')->type('datetime');

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    protected function setupShowOperation()
    {
        // by default the Show operation will try to show all columns in the db table,
        // but we can easily take over, and have full control of what columns are shown,
        // by changing this config for the Show operation

        CRUD::RemoveField('id');
        CRUD::column('datefiled')->label('Date Filed');
        CRUD::column('caseno')->type('text')->label('Case #');
        CRUD::column('complainant')->label('Complainant');
        CRUD::column('respondent')->label('Respondent');
        CRUD::column('casetitle')->label('Case Title');
        CRUD::column('casenum')->type('number')->label('Number');
        CRUD::column('disposition')->type('enum')->label('Disposition');
        CRUD::column('caselevel')->type('enum')->label('Level');
        CRUD::column('link')->label('Link');
        CRUD::column('updated_at')->type('datetime');
        CRUD::column('created_at')->type('datetime');
        // Show export to PDF, CSV, XLS and Print buttons on the table view. Please note it will only export the current _page_ of results. So in order to export all entries the user needs to make the current page show "All" entries from the top-left picker.
        //$this->crud->enableExportButtons();

    }
}
