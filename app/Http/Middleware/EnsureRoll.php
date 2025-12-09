namespace App\Http\Middleware;
<?php 
use Closure;
use Illuminate\Http\Request;

class EnsureRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        $user = session('user');
        if(!$user || ($user['role'] ?? null) !== $role){
            return redirect()->route('login')->with('error','Access denied.');
        }
        return $next($request);
    }
}