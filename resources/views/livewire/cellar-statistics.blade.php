
<!-- resources/views/livewire/cellar-statistics.blade.php -->

<div class="overflow-x-auto">
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">Nom de cellier</th>
                <th class="px-4 py-2">Nombre de bouteilles</th>
                <th class="px-4 py-2">Bouteilles consommées</th>
                <th class="px-4 py-2">Bouteilles supprimées</th>
                <th class="px-4 py-2">Dernière modification</th>
            </tr>
        </thead>
        <tbody>
            @foreach($statistics as $statistic)
                <tr>
                    <td class="border px-4 py-2">{{ $statistic->cellar_id }}</td>
                    <td class="border px-4 py-2">{{ $statistic->bottle_count }}</td>
                    <td class="border px-4 py-2">{{ $statistic->bottle_consumed }}</td>
                    <td class="border px-4 py-2">{{ $statistic->bottle_deleted }}</td>
                    <td class="border px-4 py-2">{{ $statistic->last_modified }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
