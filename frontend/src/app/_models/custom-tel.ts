/** Data structure for holding telephone number. */
export class CustomTel {
  constructor(public area: string, public exchange: string, public subscriber: string) { }

  asNumber() {
    return Number(this.area + this.exchange + this.subscriber);
  }
}
