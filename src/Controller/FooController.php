<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\FooType;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;

class FooController extends AbstractFOSRestController
{
    /**
     * @Rest\Post("/foo/bar")
     * @Rest\View(statusCode=201)
     */
    public function bar(Request $request)
    {
        $form = $this->createForm(FooType::class);

        $form->submit($request->request->all());

        if ($form->isSubmitted() && $form->isValid()) {
            return [
                'foo' => 'bar',
            ];
        }

        return $form;
    }
}
