<?php

function checkRole()
{
    if (auth()->user()->role == 1)
    {
        return true;
    }
    return false;
}
