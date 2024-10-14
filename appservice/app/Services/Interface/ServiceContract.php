<?php

namespace App\Services\Interface;

use Illuminate\Http\Request;

interface ServiceContract
{
    public function all(): array;

    public function create(array $request): array;

    public function update(array $request, $id): array;

    public function show($id): array;

    public function delete($id): array;

}
