<?php

namespace App\Http\Middleware;

use App\Models\Customers;
use Closure;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;

class Authorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->header('token');
        // dd($token);
        $customer = Customers::where('token', $token)->first();

        if ($customer == null || $token == '') {
            return response()->json(
                [
                    'status' => 'Invalid',
                    'data'  => null,
                    'error' => ['Token invalid, unauthorized']
                ],
                401
            );
        }

        $request->setUserResolver(function () use ($customer) {
            return $customer;
        });

        return $next($request);
    }
}
