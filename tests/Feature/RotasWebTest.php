<?php

namespace Tests\Feature;

use Tests\TestCase;

class RotasWebTest extends TestCase
{
    public function test_pagina_inicial_retorna_status_200(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_pagina_inicial_exibe_conteudo(): void
    {
        $response = $this->get('/');

        $response->assertSee('Laravel');
    }
}
