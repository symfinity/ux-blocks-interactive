<?php

declare(strict_types=1);

namespace Symfinity\UxBlocksInteractive\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

final class CatalogController extends AbstractController
{
    public function catalog(): Response
    {
        return $this->render('@UxBlocksInteractive/catalog.html.twig');
    }
}
