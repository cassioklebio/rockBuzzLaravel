<template>
  <div class="container mt-6">
    <div class="jumbotron p-4 p-md-5 text-black rounded">
      <div class="row mb-2">
        <div class="col-md-6">
          <div class="px-0">
            <h1 class="display-4 font-italic">
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">Rockbuzz Full Stack Laravel</font>
              </font>
            </h1>
            <p class="lead my-3">
              <font style="vertical-align: inherit;">
                <font
                  style="vertical-align: inherit;"
                >Várias linhas de texto que formam o lede, informando novos leitores de maneira rápida e eficiente sobre o que há de mais interessante no conteúdo deste post.</font>
              </font>
            </p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="row">
            <img src="./../../../img/blog.jpg" width="100%" height="100%" />
          </div>
        </div>
      </div>
    </div>

    <div v-for="post in posts" :key="post.message" class="row">
      <div class="col-md-12">
        <div
          class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative"
        >
          <div class="col p-4 d-flex flex-column position-static">
            <h3 class="mb-0">
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">{{post.title}}</font>
              </font>
            </h3>
            <div class="mb-1 text-muted">
              <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">{{post.timestamps}}</font>
              </font>
            </div>
            <p class="text-left card-text mb-auto">{{post.body}}</p>
            <a href class="stretched-link">
              <font style="vertical-align: inherit;"></font>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- /.container -->
</template>

<script>
export default {
  data() {
    return {
      posts: [],
      post: {},
      modal: false
    };
  },
  methods: {
    listar() {
      axios.get("/api/posts").then(response => {
        this.posts = response.data;
      });
    },
    apenas(id) {
      axios.get("/api/posts/" + id).then(response => {
        this.post = response.data;
        this.abre_modal();
      });
    },
    abre_modal() {
      this.modal = true;
    }
  },
  mounted() {
    this.listar();
  }
};
</script>

<style>
.item {
  border: 1px solid #ccc;
}

.post {
  position: absolute;
  top: 0;
  left: 50%;
  z-index: 99;
  width: 800px;
  height: auto;
  margin-left: -400px;
  padding: 10px;
  background-color: #eaeaea;
  color: #333;
  border: 1px solid #6e6e6e;
}

.post a {
  float: right;
  color: red;
}
</style>
