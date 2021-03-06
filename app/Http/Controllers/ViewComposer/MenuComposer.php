<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\V1\Information\InformationRepositoryInterface;
use Cart;

class MenuComposer
{
    public $repoInformation;
    /**
     * Create a movie composer.
    *
    * @return void
    */
    public function __construct(InformationRepositoryInterface $repoInformation)
    {
        $this->repoInformation = $repoInformation;
    }
     /**
     * Bind data to the view.
    *
    * @param  View  $view
    * @return void
    */
    public function compose(View $view)
    {
        $cart = Cart::getContent();
        $subtotal = Cart::getSubTotal();
        $informations = $this->repoInformation->index();

        $view->with('informations', $informations)
            ->with('cart', $cart)
            ->with('subtotal', $subtotal);
    }
}
