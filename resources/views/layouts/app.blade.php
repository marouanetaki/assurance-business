<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link rel="icon" href="https://assurance-consalti.herokuapp.com/front/icon/Favicon.png" type="image/x-icon">
    <title>Consalti Aassurance</title>
    <link rel="stylesheet" href="https://assurance-consalti.herokuapp.com/assets/vendor/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="https://assurance-consalti.herokuapp.com/assets/vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://assurance-consalti.herokuapp.com/assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css">


    <link rel="stylesheet" href="https://assurance-consalti.herokuapp.com/assets/css/main.css" type="text/css">
    @livewireStyles
</head>

<body class="theme-indigo dark-sidebar">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img src="https://assurance-consalti.herokuapp.com/front/icon/Favicon.png" width="48" height="48" alt="ArrOw">
            </div>
        </div>
    </div>

    <!---------------------------------------------------------Left Side Bar -------------------------------->
    @include('layouts.leftSide')


    <div class="page">
        <div class="container-fluid">
            {{$slot}}
            {{-- @yield('content') --}}
        </div>
    </div>

    @livewireScripts

    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script>
        window.addEventListener('add-success', event => {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: 'Enregistrement Ajouté avec succès'
                })
        })

        window.addEventListener('update-success', event => {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: 'Enregistrement Modifié avec succès'
                })
        })

        window.addEventListener('benef-inactif', event => {
            let timerInterval
            Swal.fire({
                title: 'Erreur',
                html: "Le Beneficiaire ajouté n'est pas Actif",
                timer: 3000,
                icon: 'warning',
                timerProgressBar: true,
                willClose: () => {
                    clearInterval(timerInterval)
                }
            })
        })

        window.addEventListener('erreur', event => {
            let timerInterval
            Swal.fire({
                title: 'Erreur',
                html: "veuillez réessayer ultérieurement",
                timer: 3000,
                icon: 'error',
                timerProgressBar: true,
                willClose: () => {
                    clearInterval(timerInterval)
                }
            })
        })

        window.addEventListener('age-old', event => {
            let timerInterval
            Swal.fire({
                title: 'Erreur',
                html: "Les Enfant agé plus que 21 ans ne peuvent pas etre des bénéficiaires",
                icon: 'error',
                timerProgressBar: true,
                willClose: () => {
                    clearInterval(timerInterval)
                }
            })
        })


        window.addEventListener('delete-confirmation', event => {
            Swal.fire({
                title: 'Etes-vous sûr ?',
                text: "Vous ne pourrez pas revenir en arrière !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui, Supprimer!'
                }).then((result) => {
                if (result.isConfirmed) {
                   Livewire.emit('deleteConfirmed')
                }
            })
        })

        window.addEventListener('deleted', event => {
            Swal.fire({
                title: 'Enregistrement Supprimé avec succès!',
                icon: 'success'
            })
        })

    </script>
    <!-- Core -->
    <script src="https://assurance-consalti.herokuapp.com/assets/js/libscripts.bundle.js"></script>
    <script src="https://assurance-consalti.herokuapp.com/assets/js/vendorscripts.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
    <script src="https://assurance-consalti.herokuapp.com/assets/js/theme.js"></script>
    <!-- Jquery DataTable Plugin Js -->
    <script src="https://assurance-consalti.herokuapp.com/assets/js/datatablescripts.bundle.js"></script>
    <script src="https://assurance-consalti.herokuapp.com/assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
    <script src="https://assurance-consalti.herokuapp.com/assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
    <script src="https://assurance-consalti.herokuapp.com/assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js"></script>
    <script src="https://assurance-consalti.herokuapp.com/assets/vendor/jquery-datatable/buttons/buttons.flash.min.js"></script>
    <script src="https://assurance-consalti.herokuapp.com/assets/vendor/jquery-datatable/buttons/buttons.html5.min.js"></script>
    <script src="https://assurance-consalti.herokuapp.com/assets/js/jquery-datatable.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> --}}

</body>

</html>