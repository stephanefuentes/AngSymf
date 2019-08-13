<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategoryRepository;
use App\Entity\Category;
use App\Entity\Freelance;

class CategoryController extends AbstractController
{
    /**
     * @Route("/", name="category")
     */
    public function index(CategoryRepository $repo)
    {
        $categories = $repo->findAll();

        return $this->render('category/index.html.twig', [
            'controller_name' => 'CategoryController',
            'categories' => $categories
        ]);
    }


    /**
     * @Route("/{slug}", name="show_category")
     */
    public function showCategory(Category $category)
    {

        return $this->render('category/show_category.html.twig', [
            'controller_name' => 'CategoryController',
            'category' => $category
        ]);
    }

    /**
     * @Route("/{caregory_slug}/{slug}", name="freelance")
     */
    public function showFreelance(Freelance $freelance)
    {
        //$freelance = $freelance->findOneBy(['slug' => $slug, 'category_slug' => $category_slug]);
        return $this->render('category/show_freelance.html.twig', [
            'controller_name' => 'CategoryController',
            'freelance' => $freelance
        ]);
    }
}
