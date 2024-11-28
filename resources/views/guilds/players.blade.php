@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <div class="flex justify-between items-center">

        <h1 class="text-3xl font-bold mb-4">Jogadores da Guilda: {{ $guild->name }}</h1>
        <a href="/guildas"
        class="inline-block bg-purple-500 hover:bg-purple-700 text-white font-semibold py-1 px-2 rounded-lg shadow-md transition duration-200 mr-8"
         >
        Voltar
    </a>
    </div>
    
    @if($guild->players->isEmpty())
        <p class="text-lg text-gray-600">Esta guilda não tem jogadores registrados.</p>
    @else
                
        <div class="overflow-x-auto shadow-md sm:rounded-lg border-2 border-rpg-border bg-gradient-to-br from-rpg-card-dark to-rpg-card-light backdrop-blur-sm">
          <table class="min-w-full text-sm text-left text-gray-400">
            <thead class="bg-gray-800 text-gray-200">
              <tr class="border-b-2 border-rpg-border/30">
                    <th class="py-3 px-6 border-b text-left text-sm font-semibold">Player</th>
                    <th class="py-3 px-6 border-b text-left text-sm font-semibold">Classe</th>
                    <th class="py-3 px-6 border-b text-left text-sm font-semibold">XP</th>
                    <th class="py-3 px-6 border-b text-left text-sm font-semibold">Cadastro</th>
                </tr>
            </thead>
            <tbody>
                @foreach($guild->players as $player)
                <tr class="bg-gray-800 hover:bg-gray-700 transition border-b border-rpg-border/30 hover:bg-rpg-primary/10 transition-colors">
                    <td class="px-6 py-4 flex items-center space-x-3">
                      <img src="https://picsum.photos/48/48" alt="{{ $player['name'] }}" class="w-10 h-10 rounded-full">
                      <div>
                        <p class="font-medium text-white">{{ $player['name'] }}</p>
                        <p class="text-sm">{{ $player['level'] }}</p>
                      </div>
                    </td>
                    <td class="py-3 px-6  text-sm text-white">
                    <span class="bg-purple-600 text-white text-xs font-semibold px-2 py-1 rounded">{{ $player->class->name ?? 'Desconhecido' }}</span>
                    </td>
                    <td class="px-6 py-4">
                        <p>{{ $player['xp'] }} XP</p>
                        <div class="w-full bg-gray-800 rounded-full h-2 mt-1">
                            <div class="bg-pink-600 h-2 rounded-full" style="width: {{ $player['xp'] }}%;"></div>
                        </div>
                    </td>
                    <td class="py-3 px-6  text-sm text-white">{{ $player->created_at->format('d/m/Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
      </div>
    @endif
</div>
@endsection

