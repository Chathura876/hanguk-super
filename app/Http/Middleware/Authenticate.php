<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    private $guards = [];
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function unauthenticated($request, array $guards)
    {
        $this->guards = $guards;

        parent::unauthenticated($request, $guards);
    }
    protected function redirectTo(Request $request): ?string
    {
        // Debugging: Check if the request expects JSON
        logger('Request expects JSON: ' . $request->expectsJson());

        // Debugging: Log the guards array
        logger('Guards: ' . implode(', ', $this->guards));

        // Handle redirection based on the guard, regardless of request type
        if (in_array('owner', $this->guards)) {
            logger('Redirecting to owner login');
            return route('login'); // Redirect to owner's login route
        }
        if (in_array('cashier', $this->guards)) {
            logger('Redirecting to cashier login');
            return route('cashier.login'); // Redirect to cashier's login route
        }

        // Default redirection if no specific guard matches
        logger('Redirecting to default login');
        return route('login');
    }


}
