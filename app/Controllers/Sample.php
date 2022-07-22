<?php


namespace App\Controllers; // (1)


class Sample extends BaseController // (2)
{
    public function index(): string // (3) // (4)
    {
        return "Sample Controller"; // (5)
    }
}

// (6)