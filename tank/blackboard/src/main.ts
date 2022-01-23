import './style.css'
class Blackboard {
  constructor(
    public el = document.querySelector<HTMLCanvasElement>('#canvas')!,
    private app = el.getContext('2d')!,
    private width: number = el.width,
    private height: number = el.height,
    private btns: HTMLDivElement = document.createElement('div'),
    private bgColor = '#000',
    private lineColor = '#fff'
  ) {
    this.initCanvas()
    this.bindEvent()
    this.draw()
  }

  private bindEvent() {
    const callback = this.drawLine.bind(this)

    this.el.addEventListener('mousedown', () => {
      this.app.beginPath()
      this.app.strokeStyle = this.lineColor
      this.el.addEventListener('mousemove', callback)
    })
    document.addEventListener('mouseup', () => {
      this.el.removeEventListener('mousemove', callback)
    })
  }

  private drawLine(event: MouseEvent) {
    this.app.lineTo(event.offsetX, event.offsetY)
    this.app.stroke()
  }

  private initCanvas() {
    this.app.fillStyle = this.bgColor
    this.app.fillRect(0, 0, this.width, this.height)

    this.btns.classList.add('btns')
    this.el.insertAdjacentElement('afterend', this.btns)
  }

  public setBgColor(color: string) {
    this.bgColor = color
    this.app.fillStyle = color
    this.app.fillRect(0, 0, this.el.width, this.el.height)
    return this
  }

  public clear() {
    const el = document.createElement('button')
    el.innerText = '清屏'
    this.btns.insertAdjacentElement('afterbegin', el)
    el.addEventListener('click', () => {
      this.app.fillStyle = this.bgColor
      this.app.fillRect(0, 0, this.el.width, this.el.height)
    })
    return this
  }

  public setLineColor() {
    const colors = ['#1abc9c', '#f1c40f', '#9b59b6', '#ecf0f1']
    const container = document.createElement('div')
    container.classList.add('color-container')
    colors.forEach(color => {
      const div = document.createElement('div')
      div.style.cssText = `width:20px;height:20px;background:${color}`
      container.insertAdjacentElement('afterbegin', div)

      div.addEventListener('click', () => (this.lineColor = color))
    })
    this.btns.insertAdjacentElement('beforeend', container)
  }

  public erase() {
    const el = document.createElement('button')
    el.innerText = '橡皮'
    this.btns.insertAdjacentElement('afterbegin', el)
    el.addEventListener('click', () => {
      this.lineColor = this.bgColor
      this.app.lineWidth = 10
    })
    return this
  }

  public draw() {
    const el = document.createElement('button')
    el.innerText = '写字'
    this.btns.insertAdjacentElement('afterbegin', el)
    el.addEventListener('click', () => {
      this.lineColor = 'white'
      this.app.lineWidth = 1
    })
    return this
  }

  public short() {
    const el = document.createElement('button')
    el.innerText = '截图'
    this.btns.insertAdjacentElement('afterbegin', el)
    const img = document.createElement('img')
    el.addEventListener('click', () => {
      img.src = this.el.toDataURL('image/jpeg')
      img.classList.add('img-short')
    })
    this.btns.insertAdjacentElement('afterend', img)
    return this
  }
}

const instance = new Blackboard()
instance.clear()
instance.setLineColor()
instance.erase()
instance.short()
