<template lang="html">
  <li class="isotope-item websites">
    <div class="portfolio-item img-thumbnail">
       <router-link :to="{ name: 'project.show', params: { projectSlug: project.slug }}" class="thumb-info secundary">
        <img alt="" class="img-responsive" v-bind:src="'/user/img/projects/' + project.image.main">
        <span class="thumb-info-title">
          <span class="thumb-info-inner">{{ project.name }}</span>
          <span class="thumb-info-type">{{ project.type }}</span>
        </span>
        <span class="thumb-info-action">
          <span title="Universal" class="thumb-info-action-icon"><i class="fa fa-link"></i></span>
        </span>
      </router-link>
    </div>
  </li>
</template>
<script>
  export default {
      // passing data
      props: ['project']
  }
</script>