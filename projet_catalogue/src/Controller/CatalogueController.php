<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use App\Entity\Category;
use App\Entity\Product;

class CatalogueController extends AbstractController
{
    /**
     * @Route("/", name="categories")
     */
    public function index(CategoryRepository $repo)
    {
        $categories = $repo->findAll();

        return $this->render('catalogue/index.html.twig', [
            'controller_name' => 'CatalogueController',
            'categories' => $categories
        ]);
    }

    /**
     * @Route("/category/{slug}", name="category_show")
     */
    public function showCategory(Category $category, CategoryRepository $repo, ProductRepository $repop)
    {
        $lolo = $repo->findAll();
        $lala = $repop->findAll();
        $test = $category->getProducts();
        // $category = $repo->findOneBy(['slug' => $slug]);
        dump($test);


        return $this->render('catalogue/showCategory.html.twig', [
            'controller_name' => 'CatalogueController',
            'category' => $category
        ]);
    }

    /**
     * @Route("/product/{slug}", name="product_show")
     */
    public function showProduct(ProductRepository $repo, $slug)
    {
        $product = $repo->findOneBy(['slug' => $slug]);

        return $this->render('catalogue/showProduct.html.twig', [
            'controller_name' => 'CatalogueController',
            'product' => $product
        ]);
    }
}
