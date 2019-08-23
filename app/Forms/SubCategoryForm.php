<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class SubCategoryForm extends Form
{
    public function buildForm()
    {
        $this->
            add('title', Field::TEXT, [
                'rules' => 'required|max:50',
            ])
            ->add('description', Field::TEXTAREA, [
                'rules' => 'required|max:255'
            ]);
    }
}
