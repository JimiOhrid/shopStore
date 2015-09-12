<?php

namespace App;

use Illuminate\Session\Store as Session;


class Cart
{
    /**
     * Itens in the cart
     *
     * @var array
     */
    private $items;

    /**
     * This variable will contain the cart.
     *
     * @var Session
     */
    private $session;

    /**
     * Constructor that initialises the session and the items.
     */
    public function __construct(Session $session)
    {
        $this->session=$session;
        $this->items = [];
    }

    /**
     * This method adds an item to the cart.
     *
     * @param $id
     * @param $name
     * @param $price
     * @return array
     */
    public function add($id, $name, $price)
    {
        $this->items += [
            $id => [
                'qtty' => isset($this->items[$id]['qtty']) ? $this->items[$id]['qtty']++ : 1,
                'price' => $price,
                'name' => $name
            ]
        ];
        return $this->items;
    }

    /**
     * This method removes an item from the cart.
     *
     * @param $id
     */
    public function remove($id)
    {
        unset($this->items[$id]);
    }

    /**
     * All the items stored in the current session cart.
     *
     * @return array
     */
    public function all()
    {
        return $this->items;
    }

    /**
     * Current price of the items in the cart.
     *
     * @return int
     */
    public function getTotal()
    {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item['qtty'] * $item['price'];
        }
        return $total;
    }

    /**
     * Updates the quantity of the item in the cart.
     *
     * @param $id
     * @param $qtty
     */
    public function updateQtty($id, $qtty)
    {
        if ($qtty == 0) {
            $this->destroy($id);
        } else {
            $this->items[$id]['qtty'] = $qtty;
        }
    }

    /**
     * This method destroys an item from the cart.
     *
     * @param $id
     */
    public function destroy($id)
    {
        unset($this->items[$id]);
    }

    /**
     *Removes all the items from the cart.
     */
    public function clear()
    {
        $this->items = [];
    }
}