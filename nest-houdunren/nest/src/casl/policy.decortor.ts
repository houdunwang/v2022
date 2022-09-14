import { PolicyGuard } from './policy.guard'
import { applyDecorators, SetMetadata, UseGuards } from '@nestjs/common'
import { Auth } from '@/auth/decorator/auth.decorator'
export type POLICY_CONFIG = { action: string; type: string }
export const POLICY_KEY = 'policy_key'

export function Policy(policy: POLICY_CONFIG) {
  return applyDecorators(Auth(), SetMetadata(POLICY_KEY, policy), UseGuards(PolicyGuard))
}
