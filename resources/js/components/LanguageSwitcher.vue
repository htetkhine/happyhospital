<template>
  <div class="relative">
    <button
      href="#"
      class="flex items-center"
      @click="toggleVisibility"
      @keydown.space.exact.prevent="toggleVisibility"
      @keydown.esc.exact="hideDropdown"
      @keydown.shift.tab="hideDropdown"
      @keydown.up.exact.prevent="startArrowKeys"
      @keydown.down.exact.prevent="startArrowKeys"
    >
      <img :src="`/images/${locale}1.png`" alt="flag" class="h-8 w-8">
      <span class="ml-2">{{locale.toUpperCase()}}</span>
      <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M15.3 9.3a1 1 0 0 1 1.4 1.4l-4 4a1 1 0 0 1-1.4 0l-4-4a1 1 0 0 1 1.4-1.4l3.3 3.29 3.3-3.3z"></path></svg>
    </button>
    <transition name="dropdown-fade">
      <ul v-if="isVisible" ref="dropdown" class="absolute normal-case z-30 font-normal xs:left-0 lg:right-0 bg-white shadow overflow-auto rounded w-48 border mt-2 py-1 lg:z-20 pl-0">
        <li class="list-unstyled">
          <a
            :href="link-en"
            ref="account"
            class="flex items-center px-3 py-1 hover:bg-gray-200 text-decoration-none"
            @keydown.up.exact.prevent=""
            @keydown.tab.exact="focusNext(false)"
            @keydown.down.exact.prevent="focusNext(true)"
            @keydown.esc.exact="hideDropdown"
          >
            <img :src="'/images/en1.png'" alt="english flag" class="h-8 w-8">
            <span class="ml-2 text-style">English</span>
          </a>
        </li>
        <li class="list-unstyled">
          <a
            :href="link-my"
            class="flex items-center px-3 py-1 hover:bg-gray-200 text-decoration-none"
            @keydown.shift.tab="focusPrevious(false)"
            @keydown.up.exact.prevent="focusPrevious(true)"
            @keydown.down.exact.prevent=""
            @keydown.tab.exact="hideDropdown"
            @keydown.esc.exact="hideDropdown"
          >
            <img :src="'/images/my1.png'" alt="myanmar flag" class="h-8 w-8">
            <span class="ml-2 text-style">Myanmar</span>
          </a>
        </li>
      </ul>
    </transition>
  </div>
</template>

<script>
export default {
  props: ['locale', 'link-en', 'link-my'],
  data() {
    return {
      isVisible: false,
      focusedIndex: 0,
    }
  },
  methods: {
    toggleVisibility() {
      this.isVisible = !this.isVisible
    },
    hideDropdown() {
      this.isVisible = false
      this.focusedIndex = 0
    },
    startArrowKeys() {
      if (this.isVisible) {
        // this.$refs.account.focus()
        this.$refs.dropdown.children[0].children[0].focus()
      }
    },
    focusPrevious(isArrowKey) {
      this.focusedIndex = this.focusedIndex - 1
      if (isArrowKey) {
        this.focusItem()
      }
    },
    focusNext(isArrowKey) {
      this.focusedIndex = this.focusedIndex + 1
      if (isArrowKey) {
        this.focusItem()
      }
    },
    focusItem() {
      this.$refs.dropdown.children[this.focusedIndex].children[0].focus()
    },
    setLocale(locale) {
      this.$i18n.locale = locale
      this.$router.push({
        params: { lang: locale }
      })
      this.hideDropdown()
    }
  }
}
</script>

<style scoped>
    button {
      padding: 0;
      border: none;
      font: inherit;
      color: inherit;
      background-color: transparent;
      cursor: pointer;
    }
    button:focus {
      outline: unset;
    }
    .flex {
        display: flex;
        align-items: center;
    }
    img {
        width: 20px;
        height: 20px;
    }
    ul {
        list-style-type: none;
        padding-left: 0;
        position: absolute;
        z-index: 30;
        /* right: 0; */
    }
    .relative {
        position: relative;
    }
    .dropdown-fade-enter-active, .dropdown-fade-leave-active {
        transition: all .1s ease-in-out;
    }
    .dropdown-fade-enter, .dropdown-fade-leave-to {
        opacity: 0;
        transform: translateY(-12px);
    }

    .text-style {
      text-decoration: none;
      color: teal;
    }
</style>