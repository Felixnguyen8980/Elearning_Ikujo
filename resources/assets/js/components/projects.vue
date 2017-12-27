<template lang="html">
    // template html here
    ...
    <ul class="portfolio-list sort-destination full-width" data-sort-id="portfolio">
      <Project v-for="project in projects" v-bind:project="project"></Project>
    </ul>
</template>
<script>
  import Project from './Project.vue';
  export default {
    data() {
      return {
        projects: []
      }
    },
    components: { Project },
    created() {
      this.fetchProjects();
    },
    methods: {
      fetchProjects() {
        this.$http.get('/api/guest/projects').then(response => {
          this.projects = response.data.projects;
        });
      }
    }
  }
</script>