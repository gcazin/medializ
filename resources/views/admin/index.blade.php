@extends('layouts.base')


@section('content')
    <!--Console Content-->
    <div class="flex flex-wrap">
        <div class="w-full md:w-1/2 xl:w-1/3 pr-3">
            <!--Metric Card-->
            <div class="bg-white dark:bg-gray-800 rounded shadow-md p-2">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded p-3 bg-orange-dark"><i class="fas fa-users fa-2x fa-fw fa-inverse"></i></div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h5 class="uppercase text-grey">Nombres d'utilisateurs inscrits</h5>
                        <h3 class="text-3xl">{{ count(App\User::all()) }} <span class="text-orange"><i class="fas fa-exchange-alt"></i></span></h3>
                    </div>
                </div>
            </div>
            <!--/Metric Card-->
        </div>
        <div class="w-full md:w-1/2 xl:w-1/3 pr-3">
            <!--Metric Card-->
            <div class="bg-white dark:bg-gray-800 rounded shadow-md p-2">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded p-3 bg-blue-dark"><i class="fas fa-server fa-2x fa-fw fa-inverse"></i></div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h5 class="uppercase text-grey">Nombres d'articles publiées</h5>
                        <h3 class="text-3xl">{{ count(\App\Post::all()) }}</h3>
                    </div>
                </div>
            </div>
            <!--/Metric Card-->
        </div>
        <div class="w-full md:w-1/2 xl:w-1/3">
            <!--Metric Card-->
            <div class="bg-white dark:bg-gray-800 rounded shadow-md p-2">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded p-3 bg-blue-dark"><i class="fas fa-server fa-2x fa-fw fa-inverse"></i></div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h5 class="uppercase text-grey">Server Uptime</h5>
                        <h3 class="text-3xl">152 days</h3>
                    </div>
                </div>
            </div>
            <!--/Metric Card-->
        </div>
    </div>

    <!--Divider-->
    <hr class="border-b-2 border-grey-light my-8 mx-4">

    <!--<div class="flex flex-row flex-wrap flex-grow mt-2">

        <div class="w-full md:w-1/2 pr-3">
            <div class="bg-white dark:bg-gray-800 border dark:border-transparent rounded shadow">
                <div class="border-b p-3">
                    <h5 class="uppercase text-grey-dark">Graph</h5>
                </div>
                <div class="p-5">
                    <canvas id="chartjs-7" class="chartjs" width="undefined" height="undefined"></canvas>
                    <script>
                        new Chart(document.getElementById("chartjs-7"), {
                            "type": "bar",
                            "data": {
                                "labels": ["January", "February", "March", "April"],
                                "datasets": [{
                                    "label": "Page Impressions",
                                    "data": [10, 20, 30, 40],
                                    "borderColor": "rgb(255, 99, 132)",
                                    "backgroundColor": "rgba(255, 99, 132, 0.2)"
                                }, {
                                    "label": "Adsense Clicks",
                                    "data": [5, 15, 10, 30],
                                    "type": "line",
                                    "fill": false,
                                    "borderColor": "rgb(54, 162, 235)"
                                }]
                            },
                            "options": {
                                "scales": {
                                    "yAxes": [{
                                        "ticks": {
                                            "beginAtZero": true
                                        }
                                    }]
                                }
                            }
                        });
                    </script>
                </div>
            </div>
        </div>

        <div class="w-full md:w-1/2">
            <div class="bg-white dark:bg-gray-800 border dark:border-transparent rounded shadow">
                <div class="border-b p-3">
                    <h5 class="uppercase text-grey-dark">Test</h5>
                </div>
                <div class="p-5">
                    <canvas id="chartjs-0" class="chartjs" width="undefined" height="undefined"></canvas>
                    <script>
                        new Chart(document.getElementById("chartjs-0"), {
                            "type": "line",
                            "data": {
                                "labels": ["January", "February", "March", "April", "May", "June", "July"],
                                "datasets": [{
                                    "label": "Views",
                                    "data": [65, 59, 80, 81, 56, 55, 40],
                                    "fill": false,
                                    "borderColor": "rgb(75, 192, 192)",
                                    "lineTension": 0.1
                                }]
                            },
                            "options": {}
                        });
                    </script>
                </div>
            </div>
        </div>

        <div class="w-full md:w-1/2 xl:w-1/3 pr-3 mt-3">
            <div class="bg-white dark:bg-gray-800 border dark:border-transparent rounded shadow">
                <div class="border-b p-3">
                    <h5 class="uppercase text-grey-dark">Graph</h5>
                </div>
                <div class="p-5">
                    <canvas id="chartjs-1" class="chartjs" width="undefined" height="undefined"></canvas>
                    <script>
                        new Chart(document.getElementById("chartjs-1"), {
                            "type": "bar",
                            "data": {
                                "labels": ["January", "February", "March", "April", "May", "June", "July"],
                                "datasets": [{
                                    "label": "Likes",
                                    "data": [65, 59, 80, 81, 56, 55, 40],
                                    "fill": false,
                                    "backgroundColor": ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)", "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)", "rgba(54, 162, 235, 0.2)", "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)"],
                                    "borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)", "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)", "rgb(201, 203, 207)"],
                                    "borderWidth": 1
                                }]
                            },
                            "options": {
                                "scales": {
                                    "yAxes": [{
                                        "ticks": {
                                            "beginAtZero": true
                                        }
                                    }]
                                }
                            }
                        });
                    </script>
                </div>
            </div>
        </div>

        <div class="w-full md:w-1/2 xl:w-1/3 pr-3 mt-3">
            <div class="bg-white dark:bg-gray-800 border dark:border-transparent rounded shadow">
                <div class="border-b p-3">
                    <h5 class="uppercase text-grey-dark">Graph</h5>
                </div>
                <div class="p-5"><canvas id="chartjs-4" class="chartjs" width="undefined" height="undefined"></canvas>
                    <script>
                        new Chart(document.getElementById("chartjs-4"), {
                            "type": "doughnut",
                            "data": {
                                "labels": ["P1", "P2", "P3"],
                                "datasets": [{
                                    "label": "Issues",
                                    "data": [300, 50, 100],
                                    "backgroundColor": ["rgb(255, 99, 132)", "rgb(54, 162, 235)", "rgb(255, 205, 86)"]
                                }]
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
        -->

    <div class="mx-auto">
        <div class="bg-white dark:bg-gray-800 shadow-md rounded my-6">
            <table class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                <thead>
                <tr>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">ID</th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Titre</th>
                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Contenu</th>
                    <th class="text-right py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach(App\Post::all() as $post)
                <tr class="hover:bg-grey-lighter">
                    <td class="py-4 px-6 border-b border-grey-light">{{ $post->id }}</td>
                    <td class="py-4 px-6 border-b border-grey-light">{{ $post->title }}</td>
                    <td class="py-4 px-6 border-b border-grey-light">{{ $post->description }}</td>
                    <td class="py-4 px-6 border-b border-grey-light text-right">
                        <a href="{{ route('admin.post.edit', [$post->id]) }}" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs btn btn-green hover:bg-green-dark">Modifier</a>
                        <a href="{{ route('post.show', [$post->id, $post->slug]) }}" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs btn btn-blue hover:bg-blue-dark">Voir</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


    </div>

    <!--/ Console Content-->

    </div>


    </div>
    <!--/container-->
@endsection
