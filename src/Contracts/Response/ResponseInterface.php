<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Response;

use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

interface ResponseInterface
{
    public function redirectToUrl(string $url): RedirectResponse;

    /**
     * @param array<string, mixed> $parameters
     */
    public function redirectToRoute(string $route, array $parameters = []): RedirectResponse;

    /**
     * @param array<string, mixed> $parameters
     */
    public function render(string $view, array $parameters = []): Response;

    /**
     * @param array<string|int, mixed> $data
     * @param array<string, mixed>     $headers
     */
    public function json(array $data, int $status = 200, array $headers = [], bool $json = false): JsonResponse;

    /**
     * @param array<string|int, mixed> $data
     * @param array<string, mixed>     $headers
     */
    public function jsonError(array $data, int $status = 400, array $headers = [], bool $json = false): JsonResponse;

    /**
     * @param array<string, mixed> $headers
     */
    public function file(string $file, string $filename, array $headers = []): BinaryFileResponse;

    /**
     * @param array<string, mixed> $headers
     */
    public function empty(int $status = 204, array $headers = []): Response;

    /**
     * @param array<string, mixed> $parameters
     */
    public function error(string $view, array $parameters = [], int $status = 500): Response;
}
