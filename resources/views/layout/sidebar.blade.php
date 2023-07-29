<style>
    .nav_bar a{
        text-decoration: none;
    }
    .nav_bar a div {
        padding: 1em 0 1em 0.5em;
        cursor: pointer;
        font-weight: 900;
        color: black;
        transition: 300ms ease-in-out;
    }

    .nav_bar a div:hover {
        background: #3b82f6;
        color: white;
        transition: 300ms ease-in-out
    }

</style>
<nav class="py-5 shadow-sm" style="height: 100vh">
    <h4>Back Office</h4>
    <div style="padding: 50% 0 50% 0">
        <div class="nav_bar">
            <a href="">
                <div>Membres</div>
            </a>
            <a href={{ route("etude.index") }}>
                <div>Etude</div>
            </a>
            <a href={{ route("liste_competence") }}>
                <div>Competences</div>
            </a>
            <a href={{ route("liste_role") }}>
                <div>Role</div>
            </a>
            <a href="">
                <div>Lien Personnel</div>
            </a>
            <a href="">
                <div>Experiences</div>
            </a>
            <a href="">
                <div>Formation</div>
            </a>
        </div>
    </div>
</nav>
