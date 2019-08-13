<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PromotionRepository;
use App\Entity\Promotion;
use App\Entity\Student;

class PromotionController extends AbstractController
{
    /**
     * @Route("/", name="promotion")
     */
    public function index(PromotionRepository $repo)
    {
        $promotions = $repo->findAll();

        return $this->render('promotion/index.html.twig', [
            'controller_name' => 'PromotionController',
            'promotions' => $promotions
        ]);
    }

    /**
     * @Route("/{slug}", name="promotion_show")
     */
    public function showPromotion(Promotion $promotion)
    {

        return $this->render('promotion/promotion_show.html.twig', [
            'controller_name' => 'PromotionController',
            'promotion' => $promotion
        ]);
    }


    /**
     * @Route("/{promo_slug}/{id}", name="student_show")
     */
    public function showStudent(Student $student)
    {

        return $this->render('promotion/student_show.html.twig', [
            'controller_name' => 'PromotionController',
            'student' => $student
        ]);
    }
}
