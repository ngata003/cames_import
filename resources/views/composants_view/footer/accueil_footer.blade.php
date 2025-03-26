<script src="assets/vendors/js/vendor.bundle.base.js"></script>
<script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="assets/vendors/chart.js/chart.umd.js"></script>
<script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
<script src="assets/js/off-canvas.js"></script>
<script src="assets/js/template.js"></script>
<script src="assets/js/settings.js"></script>
<script src="assets/js/hoverable-collapse.js"></script>
<script src="assets/js/todolist.js"></script>
<script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
<script src="assets/js/dashboard.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (document.getElementById("performanceArea")) {
            const ctx = document.getElementById("performanceArea").getContext("2d");

            // Récupération des données depuis Laravel
            const mois = @json($nomsMois);
            const totaux = @json($totauxMois);

            // Création d'un dégradé pour le remplissage
            const gradient = ctx.createLinearGradient(0, 0, 0, 400);
            gradient.addColorStop(0, 'rgba(63, 81, 181, 0.4)'); // Début du dégradé
            gradient.addColorStop(1, 'rgba(63, 81, 181, 0)');   // Fin du dégradé

            // Configuration du graphique en Area Chart
            const performanceAreaChart = new Chart(ctx, {
                type: 'line', // Type ligne avec remplissage pour l'effet area chart
                data: {
                    labels: mois, // Mois en X
                    datasets: [{
                        label: 'Total des Achats',
                        data: totaux, // Valeurs en Y
                        backgroundColor: gradient, // Dégradé pour l'aire
                        borderColor: '#3f51b5', // Couleur de la ligne
                        borderWidth: 2, // Épaisseur de la ligne
                        pointRadius: 4, // Taille des points
                        pointBackgroundColor: '#3f51b5', // Couleur des points
                        pointBorderColor: '#fff',
                        pointBorderWidth: 2,
                        fill: true, // Active le remplissage sous la ligne
                        tension: 0.4, // Rend la courbe plus fluide
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true, // Commence à zéro
                            grid: {
                                drawBorder: false,
                                color: 'rgba(0, 0, 0, 0.05)' // Lignes de grille discrètes
                            },
                            ticks: {
                                font: {
                                    size: 12
                                }
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                font: {
                                    size: 12
                                }
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false // Cache la légende
                        },
                        tooltip: {
                            mode: 'index',
                            intersect: false,
                            callbacks: {
                                label: function(context) {
                                    let label = context.dataset.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    if (context.parsed.y !== null) {
                                        label += new Intl.NumberFormat('fr-FR', {
                                            style: 'currency',
                                            currency: 'XAF'
                                        }).format(context.parsed.y);
                                    }
                                    return label;
                                }
                            }
                        }
                    }
                }
            });
        }
    });
</script>

</body>

</html>
