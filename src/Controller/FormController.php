<?php
/**
 * Created by PhpStorm.
 * User: juan
 * Date: 1/08/18
 * Time: 18:32
 */

namespace App\Controller;


use App\Entity\Car;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class FormController extends AbstractController
{
    /**
     * @Route("/", name="appHomepage")
     */
    public function homepage()
    {
        return $this->render("base.html.twig");
    }

    /**
     * @Route("form/results", name="formResults")
     */
    public function formResults()
    {
        return $this->render("form/formResults.html.twig");
    }

    /**
     * @Route("/form", name="form")
     */
    public function showForm(Request $request)
    {
        $car = new Car();
        //$car->setBrand("Seat");
        //$car->setModel("Leon");

        $form = $this->createFormBuilder($car)
            ->add('brand', TextType::class)
            ->add('model', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Enter car'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // perform some action...
            $car = $form->getData();
            /*return $this->redirectToRoute('formResults', [
                'brand' => $car->getBrand(),
                'model' => $car->getModel()
            ]);*/
            return $this->render('form/formResults.html.twig', [
                'brand' => $car->getBrand(),
                'model' => $car->getModel()
            ]);
        }

        return $this->render("form/form.html.twig", array(
            'form' => $form->createView(),
            ));
    }
}