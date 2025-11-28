<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cerveja;

class CadastrarController extends Controller
{
    //Regra de Negócio: validar e persistir banco de dados
    public function salvar(Request $request)
    {
        // Valida e já captura os dados limpos na variável $dados
        $dados = $request->validate(
            [
                // Campos de Texto Obrigatórios
                'name' => 'required|string|max:255',
                'brand' => 'required|string|max:255',
                'style' => 'required|string|max:255',

                // Checkbox (Boolean)
                'artesanal' => 'boolean',

                // Select (Enum)
                'embalagem' => 'required|string|in:lata,garrafa,barril',

                // Números
                'ibu' => 'nullable|integer|min:0',
                'abv' => 'required|numeric|min:0|max:100',

                // Texto Longo
                'descricao' => 'nullable|string|max:1000',
            ],
            [
                // --- MENSAGENS PERSONALIZADAS ---

                // Mensagens para Nome
                'name.required' => 'O campo "Nome" é obrigatório.',
                'name.max' => 'O nome da cerveja é muito longo (máximo 255 caracteres).',

                // Mensagens para Marca
                'brand.required' => 'O campo "Marca" é obrigatório.',
                'brand.max' => 'A marca é muito longa.',

                // Mensagens para Estilo
                'style.required' => 'Por favor, informe o estilo da cerveja.',

                // Mensagens para Embalagem (Segurança)
                'embalagem.required' => 'Você deve selecionar uma embalagem.',
                'embalagem.in' => 'A embalagem selecionada é inválida. Escolha Lata, Garrafa ou Barril.',

                // Mensagens para IBU
                'ibu.integer' => 'O IBU deve ser um número inteiro.',
                'ibu.min' => 'O amargor não pode ser negativo.',

                // Mensagens para ABV
                'abv.required' => 'O Teor Alcoólico é obrigatório.',
                'abv.numeric' => 'O teor alcoólico deve ser um número (use ponto para decimais).',
                'abv.min' => 'O teor alcoólico não pode ser negativo.',
                'abv.max' => 'O teor alcoólico não pode ser maior que 100%.',

                // Mensagem para Descrição
                'descricao.max' => 'A descrição não pode ultrapassar 1000 caracteres.',

                // Regras específicas
                'embalagem.in' => 'Não tente burlar o sistema, escolha uma embalagem válida!',
                'abv.max' => 'Calma lá! Mais de 100% de álcool é impossível.',
            ]
        );

        Cerveja::create($dados);

        //dd($request);
        return view('cadastro_salvo');
    }
}
