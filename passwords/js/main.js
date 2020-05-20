var app4 = new Vue({
    el: "#passwords",
    data() {
      return {
        accounts: [],
      }
    },
    mounted() {
      fetch("/personal/json-api/open.php?filename=passwords.json")
        .then((res) => res.json())
        .then((json) => {
          if (json.statusCode === 200) {
            this.accounts = json.data
          }
        })
    },
  })