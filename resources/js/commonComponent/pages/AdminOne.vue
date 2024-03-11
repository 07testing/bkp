<template>
  <h4>Salling List</h4>
  <table class="table">
    <thead>
      <tr>
        <th>S.N</th>
        <th>Title</th>
        <th>Body</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="item in listing" :key="item.id">
        <td>{{ item.id }}</td>
        <td>{{ item.title }}</td>
        <td>{{ item.body }}</td>
      </tr>
    </tbody>
  </table>
</template>
<script>
import { mapState } from "vuex";
export default {
  name: "AdminFifteen",
  data() {
    return {};
  },
  methods: {
    async getAll() {
      try {
        await this.$store.dispatch("getSallingList");
      } catch (error) {
        console.error("Error fetching selling list:", error);
      } finally {
      }
    },
  },
  computed: {
    ...mapState({
      listing: (state) => state.post.result,
    }),
  },
  mounted() {
    this.getAll();
  },
};
</script>
