<?php

namespace Tests\Feature;

use App\Models\Caixa;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MeuPrimeiroTest extends TestCase
{
    public function testCaixaContemItem()
    {
        $caixa = new Caixa(['carro', 'mochila', 'garfo']);
        $this->assertTrue($caixa->contem('mochila'));
        $this->assertFalse($caixa->contem('cubo magico'));
    }

    public function testCaixaContemUmItem()
    {
        $caixa = new Caixa(['lençol']);
        $this->assertEquals('lençol', $caixa->pegarUm());
        // Null, agora a caixa está vazia
        $this->assertNull($caixa->pegarUm());
    }

    public function testComecaComLetra()
    {
        $caixa = new Caixa(['cooler', 'mouse', 'fone', 'celular', 'computador']);

        $results = $caixa->comecaCom('c');

        $this->assertCount(3, $results);
        $this->assertContains('cooler', $results);
        $this->assertContains('celular', $results);
        $this->assertContains('computador', $results);

        // Vai devolver um array vazio
        $this->assertEmpty($caixa->comecaCom('s'));
    }
}
