<template>
    <div id="wrapper" class="d-flex align-items-center min-vh-100 container">
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="contensst">
                <div class="container-fluid">

                    <!-- 404 Error Text -->
                    <div class="text-center">
                        <div class="error mx-auto" data-text="404">404</div>
                        <p class="lead text-gray-800 mb-5">Page Not Found</p>
                        <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
                        <router-link to="/" exact>&larr; Back to Dashboard</router-link>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Page404',
    }
</script>
