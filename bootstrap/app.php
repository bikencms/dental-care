<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Spatie\Permission\Middleware\RoleMiddleware;
use Spatie\Permission\Middleware\PermissionMiddleware;
use Spatie\Permission\Middleware\RoleOrPermissionMiddleware;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Spatie\Permission\Exceptions\UnauthorizedException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function ($middleware) {
        $middleware->alias([
            'role' => RoleMiddleware::class,
            'permission' => PermissionMiddleware::class,
            'role_or_permission' => RoleOrPermissionMiddleware::class,
            'localization' => \App\Http\Middleware\Localization::class,
        ]);
        $middleware->append(\App\Http\Middleware\Localization::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        
        // Bắt lỗi 403 chung hoặc lỗi role của Spatie
        $exceptions->render(function (AccessDeniedHttpException|UnauthorizedException $e, Request $request) {
            
            // Nếu là request AJAX / API thì trả về JSON như bình thường
            if ($request->expectsJson()) {
                return response()->json(['message' => 'User does not have the right role.'], 403);
            }

            // Chuyển hướng về trang dashboard kèm thông báo
            return redirect()->route('dashboard')->with('error', 'Bạn không có quyền truy cập vào trang này!');
        });

    })->create();
