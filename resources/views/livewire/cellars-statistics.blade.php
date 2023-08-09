<section>
    <div class="text-3xl font-bold">Cellieres</div>
    <div class="overflow-x-auto">
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2">#</th>
                    <th class="px-4 py-2">Cellier ID</th>
                    <th class="px-4 py-2">Nom Cellier</th>
                    <th class="px-4 py-2">User ID</th>
                    <th class="px-4 py-2">Nombre de bouteilles</th>
                    <!-- <th class="px-4 py-2">Bouteilles consommées</th> -->
                    <th class="px-4 py-2">Bouteilles supprimées</th>
                    <th class="px-4 py-2">Dernière modification</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cellars_statistics as $index=>$cellar)
                <tr>

                    <td class="border px-4 py-2">{{ $index+1 }}</td>
                    <td class="border px-4 py-2">{{ $cellar->cellar_id }}</td>
                    <td class="border px-4 py-2">{{ $cellar->name }}</td>
                    <td class="border px-4 py-2">{{ $cellar->user_id }}</td>
                    <td class="border px-4 py-2">{{ $cellar->bottle_count }}</td>
                    <td class="border px-4 py-2">{{ $cellar->bottle_deleted }}</td>
                    <td class="border px-4 py-2">{{ $cellar->last_modified }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</section>