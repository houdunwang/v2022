<script setup lang="ts">
import menuService from '@/composables/useMenu'
import { watch } from 'vue'
import { useRoute } from 'vue-router'
import { RouteEnum } from '@/enum/RouteEnum'
import * as icons from '@icon-park/vue-next'
const route = useRoute()

watch(route, () => menuService.setCurrentMenu(route), { immediate: true })
</script>

<template>
  <div class="admin-menu z-50" :class="{ close: menuService.close.value }">
    <div class="menu w-[200px] bg-gray-800">
      <div class="logo cursor-pointer">
        <icon-home
          theme="outline"
          size="18"
          fill="#dcdcdc"
          class="mr-2"
          @click="$router.push({ name: RouteEnum.HOME })" />
        <span class="text-md cursor-pointer" @click="$router.push({ name: RouteEnum.ADMIN })">晚八点直播</span>
      </div>
      <!-- 菜单 -->
      <div class="container">
        <dl v-for="(menu, index) of menuService.menus.value" :key="index">
          <dt @click="menuService.toggleParentMenu(menu)">
            <section>
              <component :is="icons[menu.icon!]" size="18" fill="#dcdcdc" class="mr-2" />
              <span class="text-md">{{ menu.title }}</span>
            </section>
            <section>
              <icon-up
                theme="filled"
                size="24"
                fill="#555"
                strokeLinejoin="bevel"
                strokeLinecap="butt"
                :class="{ 'rotate-180': menu.isClick }"
                class="duration-300" />
              <!-- <i class="fas fa-angle-down duration-300" :class="{ 'rotate-180': menu.isClick }"></i> -->
            </section>
          </dt>
          <dd :class="!menu.isClick || menuService.close.value ? 'hidden' : 'block'">
            <div
              :class="{ active: cmenu.isClick }"
              v-for="(cmenu, key) of menu.children"
              :key="key"
              @click="$router.push({ name: cmenu.route })">
              {{ cmenu?.title }}
            </div>
          </dd>
        </dl>
      </div>
    </div>
    <div class="bg block md:hidden" @click="menuService.toggleState"></div>
  </div>
</template>
<style lang="scss">
.admin-menu {
  @apply z-20;

  .menu {
    @apply h-full;

    .logo {
      @apply text-gray-300 flex items-center p-4;
    }

    .container {
      dl {
        @apply text-gray-300 text-sm relative p-4;

        dt {
          @apply text-sm flex justify-between cursor-pointer items-center;

          section {
            @apply flex items-center;

            i {
              @apply mr-2 text-sm;
            }
          }
        }

        dd {
          div {
            @apply py-3 pl-4 my-2 text-white rounded-md cursor-pointer duration-300 hover:bg-violet-500 bg-gray-700;

            &.active {
              @apply bg-violet-700;
            }
          }
        }
      }
    }
  }
}

@media screen and (min-width: 768px) {
  .admin-menu {
    &.close {
      .menu {
        width: auto;

        .logo {
          @apply mr-0 justify-center;

          i {
            @apply mr-0;
          }

          span {
            @apply hidden;
            &.i-icon {
              @apply mr-0 block;
            }
          }
        }

        .container {
          dl {
            &:hover {
              dd {
                @apply block absolute left-full top-[0px] w-[200px] bg-gray-700 px-2;
              }
            }
            dt {
              @apply flex justify-center;

              section {
                i {
                  @apply mr-0;
                }

                span {
                  @apply hidden;
                  &.i-icon {
                    @apply mr-0 block;
                  }
                }

                &:nth-of-type(2) {
                  @apply hidden;
                }
              }
            }
            dd {
              padding: 0 !important;
              div {
                @apply m-0 rounded-none;
              }
            }
          }
        }
      }
    }
  }
}

@media screen and(max-width:768px) {
  .admin-menu {
    @apply h-screen w-[200px] absolute left-0 top-0 z-50;

    .menu {
      @apply h-full z-50 absolute;
    }

    .bg {
      @apply bg-gray-100 z-40 opacity-75 w-screen h-screen absolute left-0 top-0;
    }

    &.close {
      @apply hidden;
    }
  }
}
</style>
