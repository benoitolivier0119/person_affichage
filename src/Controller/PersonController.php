<?php
 
namespace App\Controller;
 
 
use App\Entity\Person;
use App\Repository\PersonRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
 
 
/**
* @Route("/person")
*/
class PersonController extends AbstractController
{
   /**
    * @Route("/", name="person_index")
    */
   public function index(PersonRepository $personRepository)
   {
       $data = $personRepository->findAll();
       return $this->render('person/index.html.twig',
       [
        'persons' => $data,
       ]);
   }

/**
    * @Route("/add", name="person_add")
    */
public function add(Request $request){
    $person = new Person();
    $form = $this->createForm(Person::class, $person);
    $form->handleRequest();

    if ($form->isSubmitted() && $form->isValid()){
        $entitymanager = $this->getDoctrine()->getManager();
        $entitymanager->persist($person);
        $entitymanager->flush();
        
        return $this->redirectToRoute('person_add');
    }
    
    return $this->render('person/add.html.twig', [
        'form' => $form->createView(),
    ]);

}


}
