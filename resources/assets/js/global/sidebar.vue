<template lang="html">
  <div class="fixed-sidebar-left">
    <ul class="nav navbar-nav side-nav nicescroll-bar">
      <li class="navigation-header">
        <span>Principale</span>
        <i class="zmdi zmdi-more"></i>
      </li>
      <li>
        <a style="cursor:pointer;" @click="$router.push({ path: `/` })" :class="$route.name == 'Tableau de bord' ? 'active':'' ">
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
        <a style="cursor:pointer;" @click="$router.push({ path: `/clients` })" :class="$route.name == 'Clients' ? 'active':'' ">
          <div class="pull-left">
            <i class="zmdi zmdi-flag mr-20"></i>
            <span class="right-nav-text">Clients</span>
          </div>
          <div class="clearfix"></div>
        </a>
      </li>
      <li>
        <a style="cursor:pointer;" @click="$router.push({ path: `/prospects` })" :class="$route.name == 'Prospects' ? 'active':'' ">
          <div class="pull-left">
            <i class="zmdi zmdi-flag mr-20"></i>
            <span class="right-nav-text">Prospects</span>
          </div>
          <div class="clearfix"></div>
        </a>
      </li>
      <li>
        <a style="cursor:pointer;" @click="$router.push({ path: `/devis` })" :class="$route.name == 'Devis' ? 'active':'' ">
          <div class="pull-left">
            <i class="zmdi zmdi-flag mr-20"></i>
            <span class="right-nav-text">Devis</span>
          </div>
          <div class="clearfix"></div>
        </a>
      </li>
      <li>
        <a style="cursor:pointer;" @click="$router.push({ path: `/commandes` })" :class="$route.name == 'Commandes' ? 'active':'' ">
          <div class="pull-left">
            <i class="zmdi zmdi-flag mr-20"></i>
            <span class="right-nav-text">Commandes</span>
          </div>
          <div class="clearfix"></div>
        </a>
      </li>
      <li>
        <a style="cursor:pointer;" @click="$router.push({ path: `/factures` })" :class="$route.name == 'Factures' ? 'active':'' ">
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
        <a style="cursor:pointer;" @click="$router.push({ path: `/fournisseurs` })" :class="$route.name == 'Fournisseurs' ? 'active':'' ">
          <div class="pull-left">
            <i class="zmdi zmdi-flag mr-20"></i>
            <span class="right-nav-text">Fournisseurs</span>
          </div>
          <div class="clearfix"></div>
        </a>
      </li>
      <li>
        <a style="cursor:pointer;" @click="$router.push({ path: `/produits` })" :class="$route.name == 'Produits' ? 'active':'' ">
          <div class="pull-left">
            <i class="zmdi zmdi-flag mr-20"></i>
            <span class="right-nav-text">Produits</span>
          </div>
          <div class="clearfix"></div>
        </a>
      </li>
      <li>
        <a style="cursor:pointer;" @click="$router.push({ path: `/bondecommandes` })" :class="$route.name == 'Bon de commandes' ? 'active':'' ">
          <div class="pull-left">
            <i class="zmdi zmdi-flag mr-20"></i>
            <span class="right-nav-text">Bon de commandes</span>
          </div>
          <div class="clearfix"></div>
        </a>
      </li>

      <li class="navigation-header">
        <span>Rendez-vous</span>
        <i class="zmdi zmdi-more"></i>
      </li>
      <li>
        <a style="cursor:pointer;" @click="$router.push({ path: `/rendezvous` })" :class="$route.name == 'Rendez-vous' ? 'active':'' ">
          <div class="pull-left">
            <i class="zmdi zmdi-flag mr-20"></i>
            <span class="right-nav-text">Rendez-vous</span>
          </div>
          <div class="clearfix"></div>
        </a>
      </li>
      <li>
        <a style="cursor:pointer;" @click="$router.push({ path: `/visites` })" :class="$route.name == 'Visites' ? 'active':'' ">
          <div class="pull-left">
            <i class="zmdi zmdi-flag mr-20"></i>
            <span class="right-nav-text">Visites</span>
          </div>
          <div class="clearfix"></div>
        </a>
      </li>
      <li>
        <a style="cursor:pointer;" @click="$router.push({ path: `/calendrier` })" :class="$route.name == 'Calendrier' ? 'active':'' ">
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
