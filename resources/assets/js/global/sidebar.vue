<template lang="html">
  <div class="fixed-sidebar-left">
    <ul class="nav navbar-nav side-nav nicescroll-bar">
      <li class="navigation-header">
        <span>Principale</span>
        <i class="zmdi zmdi-more"></i>
      </li>
      <li>
        <a style="cursor:pointer;" @click="$router.push({ path: `/` })">
          <div class="pull-left">
            <i class="zmdi zmdi-flag mr-20"></i>
            <span class="right-nav-text">Tableau de bord</span>
          </div>
          <div class="clearfix"></div>
        </a>
      </li>
      <li class="navigation-header">
        <span>Clients</span>
        <i class="zmdi zmdi-more"></i>
      </li>
      <li>
        <a style="cursor:pointer;" @click="$router.push({ path: `/clients` })">
          <div class="pull-left">
            <i class="zmdi zmdi-flag mr-20"></i>
            <span class="right-nav-text">Clients</span>
          </div>
          <div class="clearfix"></div>
        </a>
      </li>
      <li>
        <a style="cursor:pointer;" @click="$router.push({ path: `/prospects` })">
          <div class="pull-left">
            <i class="zmdi zmdi-flag mr-20"></i>
            <span class="right-nav-text">Prospects</span>
          </div>
          <div class="clearfix"></div>
        </a>
      </li>
      <li>
        <a style="cursor:pointer;" @click="$router.push({ path: `/devis` })">
          <div class="pull-left">
            <i class="zmdi zmdi-flag mr-20"></i>
            <span class="right-nav-text">Devis</span>
          </div>
          <div class="clearfix"></div>
        </a>
      </li>
      <li>
        <a style="cursor:pointer;" @click="$router.push({ path: `/commandes` })">
          <div class="pull-left">
            <i class="zmdi zmdi-flag mr-20"></i>
            <span class="right-nav-text">Commandes</span>
          </div>
          <div class="clearfix"></div>
        </a>
      </li>
      <li>
        <a style="cursor:pointer;" @click="$router.push({ path: `/factures` })">
          <div class="pull-left">
            <i class="zmdi zmdi-flag mr-20"></i>
            <span class="right-nav-text">Factures</span>
          </div>
          <div class="clearfix"></div>
        </a>
      </li>
      <li class="navigation-header">
        <span>Fournisseurs</span>
        <i class="zmdi zmdi-more"></i>
      </li>
      <li>
        <a style="cursor:pointer;" @click="$router.push({ path: `/fournisseurs` })">
          <div class="pull-left">
            <i class="zmdi zmdi-flag mr-20"></i>
            <span class="right-nav-text">Fournisseurs</span>
          </div>
          <div class="clearfix"></div>
        </a>
      </li>
      <li>
        <a style="cursor:pointer;" @click="$router.push({ path: `/produits` })">
          <div class="pull-left">
            <i class="zmdi zmdi-flag mr-20"></i>
            <span class="right-nav-text">Produits</span>
          </div>
          <div class="clearfix"></div>
        </a>
      </li>
      <li>
        <a style="cursor:pointer;" @click="$router.push({ path: `/bondecommande` })">
          <div class="pull-left">
            <i class="zmdi zmdi-flag mr-20"></i>
            <span class="right-nav-text">Bon de commande</span>
          </div>
          <div class="clearfix"></div>
        </a>
      </li>

      <li class="navigation-header">
        <span>Rendez-vous</span>
        <i class="zmdi zmdi-more"></i>
      </li>
      <li>
        <a style="cursor:pointer;" @click="$router.push({ path: `/rendezvous` })">
          <div class="pull-left">
            <i class="zmdi zmdi-flag mr-20"></i>
            <span class="right-nav-text">Rendez-vous</span>
          </div>
          <div class="clearfix"></div>
        </a>
      </li>
      <li>
        <a style="cursor:pointer;" @click="$router.push({ path: `/visites` })">
          <div class="pull-left">
            <i class="zmdi zmdi-flag mr-20"></i>
            <span class="right-nav-text">Visites</span>
          </div>
          <div class="clearfix"></div>
        </a>
      </li>
      <li>
        <a style="cursor:pointer;" @click="$router.push({ path: `/calendrier` })">
          <div class="pull-left">
            <i class="zmdi zmdi-flag mr-20"></i>
            <span class="right-nav-text">Calendrier</span>
          </div>
          <div class="clearfix"></div>
        </a>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
}
</script>

<style lang="css">
</style>
