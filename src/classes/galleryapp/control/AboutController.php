<?php

namespace MediaPhoto\galleryapp\control;

use MediaPhoto\galleryapp\view\AboutView;
use MediaPhoto\mf\control\AbstractController;

class AboutController extends AbstractController
{
    public function execute(): void
    {
        $AboutView = new AboutView;
        $AboutView->makePage();
    }
}
