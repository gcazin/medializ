<?php

namespace App\Forms;

use App\Category;
use App\Post;
use App\Subcategory;
use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class PostForm extends Form
{
    public function buildForm()
    {

        $categories = array_filter(array_merge(array(0), Category::pluck('name')->all()));
        $subcategories = array_filter(array_merge(array(0), Subcategory::pluck('title')->all()));

        $this
            ->add('category_id', Field::SELECT, [
                'label' => "Catégorie",
                'choices' => [$categories],
                'rules' => 'required',
                'empty_value' => 'Choisir la catégorie',
            ])
            ->add('subcategory_id', Field::SELECT, [
                'label' => "Sous-catégorie",
                'choices' => [$subcategories],
                'rules' => 'required',
                'empty_value' => 'Choisir la sous-catégorie'
            ])
            ->add('youtube_url', Field::TEXT, [
                'label' => "URL",
                'rules' => 'required|max:255'
            ])
            ->add('title', Field::TEXT, [
                'label' => "Titre du post",
                'rules' => 'required|max:255'
            ])
            ->add('description', Field::TEXTAREA, [
                'label' => "Description",
                'rules' => 'required|max:255'
            ])
            ->add('submit', Field::BUTTON_SUBMIT, [
                'label' => "Créer un post"
            ]);
    }
}
