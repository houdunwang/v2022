import { TopicPolicy } from './../topic/topic.policy'
import { registerAs } from '@nestjs/config'

export const policy = registerAs('policy', () => {
  return {
    Topic: new TopicPolicy(),
  }
})
