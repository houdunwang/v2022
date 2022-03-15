export default {
  el(id: string) {
    return document.querySelector<HTMLAudioElement>(id)!
  },
  start() {
    this.el('#aStart').play()
  },
  fire() {
    this.el('#aFire').play()
  },
  blast() {
    this.el('#aBlast').play()
  },
}
