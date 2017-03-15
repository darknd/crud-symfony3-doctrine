<?php
/**
 * Created by PhpStorm.
 * User: darknd
 * Date: 15/03/17
 * Time: 10:19
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Consoles;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class databaseController extends Controller
{
    /**
     * @Route("/create")
     */
    public function create()
    {
        $console = new Consoles();
        $console->setName('console' . random_int(1, 100));
        $em = $this->getDoctrine()->getManager();
        $em->persist($console);
        $em->flush();
        return $this->render('successful.html.twig');
    }

    /**
     * @Route("/read")
     * @Route("/read/{id}")
     */
    public function read($id=null){
        if (!empty($id)){
            $em = $this->getDoctrine()->getManager();
            $console = $em->getRepository('AppBundle:Consoles')
                ->findOneBy(['id' => $id]);
            if (!$console) {
                throw $this->createNotFoundException('No console found');
            }
            return $this->render('show.html.twig', [
                'console' => $console
            ]);
        }else {
            $em = $this->getDoctrine()->getManager();
            $consoles = $em->getRepository('AppBundle:Consoles')
                ->findAll();
            return $this->render('read.html.twig', [
                'consoles' => $consoles
            ]);
        }
    }

    /**
     * @Route ("/update")
     * @Route("/update/{id}")
     */
    public function update($id=null){
        if (!empty($id)){
            $em = $this->getDoctrine()->getManager();
            $console = $em->getRepository('AppBundle:Consoles')->find($id);
            if (!$console) {
                throw $this->createNotFoundException('No console found for id '.$id);
            }
            $console->setId($id);
            $console->setName('updated');
            $em->merge($console);
            $em->flush();
            return $this->render('updated.html.twig');
        }else{
            return $this->render('update.html.twig');
        }
    }

    /**
     * @Route("/delete")
     * @Route("/delete/{id}")
     */
    public function delete($id=null){
        if (!empty($id)) {

            $em = $this->getDoctrine()->getManager();
            $console = $em->getRepository('AppBundle:Consoles')->find($id);

            if (!$console) {
                throw $this->createNotFoundException('No console found for id ' . $id);
            }

            $em->remove($console);
            $em->flush();
            return $this->render('deleted.html.twig');
        }else{
            return $this->render('delete.html.twig');
        }
    }

}